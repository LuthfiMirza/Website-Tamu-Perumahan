// Touch Gestures Implementation
class TouchGestures {
    constructor() {
        this.initSwipeToRefresh();
        this.initPullToLoadMore();
        this.initPinchToZoom();
        this.initSwipeActions();
    }

    // Swipe to Refresh
    initSwipeToRefresh() {
        let startY = 0;
        let currentY = 0;
        let isRefreshing = false;
        let refreshThreshold = 80;

        const refreshIndicator = this.createRefreshIndicator();
        
        document.addEventListener('touchstart', (e) => {
            if (window.scrollY === 0 && !isRefreshing) {
                startY = e.touches[0].clientY;
            }
        }, { passive: true });

        document.addEventListener('touchmove', (e) => {
            if (startY > 0 && window.scrollY === 0 && !isRefreshing) {
                currentY = e.touches[0].clientY;
                const pullDistance = currentY - startY;

                if (pullDistance > 0) {
                    e.preventDefault();
                    this.updateRefreshIndicator(refreshIndicator, pullDistance, refreshThreshold);
                }
            }
        }, { passive: false });

        document.addEventListener('touchend', (e) => {
            if (startY > 0 && !isRefreshing) {
                const pullDistance = currentY - startY;
                
                if (pullDistance > refreshThreshold) {
                    this.triggerRefresh(refreshIndicator);
                } else {
                    this.hideRefreshIndicator(refreshIndicator);
                }
                
                startY = 0;
                currentY = 0;
            }
        });
    }

    createRefreshIndicator() {
        const indicator = document.createElement('div');
        indicator.id = 'refresh-indicator';
        indicator.innerHTML = `
            <div class="refresh-spinner">
                <i class="fas fa-sync-alt"></i>
            </div>
            <div class="refresh-text">Tarik untuk refresh</div>
        `;
        indicator.style.cssText = `
            position: fixed;
            top: -80px;
            left: 0;
            right: 0;
            height: 80px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            transition: transform 0.3s ease;
            font-size: 14px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        `;
        
        document.body.appendChild(indicator);
        return indicator;
    }

    updateRefreshIndicator(indicator, pullDistance, threshold) {
        const progress = Math.min(pullDistance / threshold, 1);
        const translateY = Math.min(pullDistance * 0.5, 80);
        
        indicator.style.transform = `translateY(${translateY}px)`;
        
        const spinner = indicator.querySelector('.refresh-spinner i');
        const text = indicator.querySelector('.refresh-text');
        
        if (progress >= 1) {
            text.textContent = 'Lepas untuk refresh';
            spinner.style.transform = `rotate(180deg)`;
            indicator.style.background = 'linear-gradient(135deg, #22c55e 0%, #16a34a 100%)';
        } else {
            text.textContent = 'Tarik untuk refresh';
            spinner.style.transform = `rotate(${progress * 180}deg)`;
            indicator.style.background = 'linear-gradient(135deg, #667eea 0%, #764ba2 100%)';
        }
    }

    triggerRefresh(indicator) {
        indicator.style.transform = 'translateY(80px)';
        indicator.querySelector('.refresh-text').textContent = 'Refreshing...';
        indicator.querySelector('.refresh-spinner i').style.animation = 'spin 1s linear infinite';
        indicator.style.background = 'linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%)';
        
        // Simulate refresh
        setTimeout(() => {
            window.location.reload();
        }, 1000);
    }

    hideRefreshIndicator(indicator) {
        indicator.style.transform = 'translateY(-80px)';
    }

    // Pull to Load More
    initPullToLoadMore() {
        let isLoading = false;
        
        window.addEventListener('scroll', () => {
            if (isLoading) return;
            
            const scrollTop = window.pageYOffset;
            const windowHeight = window.innerHeight;
            const docHeight = document.documentElement.scrollHeight;
            
            if (scrollTop + windowHeight >= docHeight - 100) {
                this.loadMoreContent();
                isLoading = true;
            }
        });
    }

    loadMoreContent() {
        const loadingIndicator = document.createElement('div');
        loadingIndicator.className = 'load-more-indicator';
        loadingIndicator.innerHTML = `
            <div style="text-align: center; padding: 20px; color: #666; background: white; margin: 10px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                <i class="fas fa-spinner fa-spin" style="color: #3b82f6; font-size: 1.2rem;"></i>
                <div style="margin-top: 8px; font-weight: 500;">Memuat lebih banyak...</div>
            </div>
        `;
        
        document.body.appendChild(loadingIndicator);
        
        // Simulate loading
        setTimeout(() => {
            loadingIndicator.remove();
            console.log('Load more data would be implemented here');
            
            // Show completion message
            if (typeof Swal !== 'undefined') {
                Swal.fire({
                    toast: true,
                    position: 'bottom-end',
                    showConfirmButton: false,
                    timer: 2000,
                    icon: 'info',
                    title: 'Semua data telah dimuat'
                });
            }
        }, 2000);
    }

    // Pinch to Zoom for Images
    initPinchToZoom() {
        let scale = 1;
        let initialDistance = 0;
        let isZooming = false;
        let initialScale = 1;

        document.addEventListener('touchstart', (e) => {
            if (e.touches.length === 2) {
                const target = e.target;
                if (target.tagName === 'IMG') {
                    isZooming = true;
                    initialDistance = this.getDistance(e.touches[0], e.touches[1]);
                    initialScale = this.getCurrentScale(target);
                    target.style.transition = 'none';
                    target.style.transformOrigin = 'center center';
                }
            }
        });

        document.addEventListener('touchmove', (e) => {
            if (isZooming && e.touches.length === 2) {
                e.preventDefault();
                const target = e.target;
                const currentDistance = this.getDistance(e.touches[0], e.touches[1]);
                const scaleChange = currentDistance / initialDistance;
                scale = Math.min(Math.max(0.5, initialScale * scaleChange), 3);
                
                target.style.transform = `scale(${scale})`;
            }
        }, { passive: false });

        document.addEventListener('touchend', (e) => {
            if (isZooming) {
                const target = e.target;
                target.style.transition = 'transform 0.3s ease';
                
                if (scale < 1) {
                    target.style.transform = 'scale(1)';
                    scale = 1;
                } else if (scale > 2.5) {
                    target.style.transform = 'scale(2.5)';
                    scale = 2.5;
                }
                
                isZooming = false;
                
                // Double tap to reset
                setTimeout(() => {
                    target.addEventListener('touchend', function resetZoom() {
                        target.style.transform = 'scale(1)';
                        target.removeEventListener('touchend', resetZoom);
                    }, { once: true });
                }, 300);
            }
        });
    }

    getDistance(touch1, touch2) {
        const dx = touch1.clientX - touch2.clientX;
        const dy = touch1.clientY - touch2.clientY;
        return Math.sqrt(dx * dx + dy * dy);
    }

    getCurrentScale(element) {
        const transform = window.getComputedStyle(element).transform;
        if (transform === 'none') return 1;
        
        const matrix = transform.match(/matrix\(([^)]+)\)/);
        if (matrix) {
            const values = matrix[1].split(',');
            return parseFloat(values[0]);
        }
        return 1;
    }

    // Swipe Actions for Table Rows
    initSwipeActions() {
        const tableRows = document.querySelectorAll('tbody tr');
        
        tableRows.forEach(row => {
            let startX = 0;
            let currentX = 0;
            let isSwipping = false;
            let startTime = 0;

            row.addEventListener('touchstart', (e) => {
                startX = e.touches[0].clientX;
                startTime = Date.now();
                isSwipping = true;
                row.style.transition = 'none';
            });

            row.addEventListener('touchmove', (e) => {
                if (!isSwipping) return;
                
                currentX = e.touches[0].clientX;
                const diffX = currentX - startX;
                const diffTime = Date.now() - startTime;
                
                // Only allow horizontal swipe if it's clearly horizontal
                if (Math.abs(diffX) > 10 && diffTime > 100) {
                    e.preventDefault();
                    row.style.transform = `translateX(${diffX}px)`;
                    
                    // Show action buttons
                    if (diffX < -50) {
                        this.showSwipeActions(row, 'left');
                    } else if (diffX > 50) {
                        this.showSwipeActions(row, 'right');
                    } else {
                        this.hideSwipeActions(row);
                    }
                }
            }, { passive: false });

            row.addEventListener('touchend', (e) => {
                if (!isSwipping) return;
                
                const diffX = currentX - startX;
                row.style.transition = 'transform 0.3s ease';
                
                if (Math.abs(diffX) > 100) {
                    this.executeSwipeAction(row, diffX > 0 ? 'right' : 'left');
                } else {
                    row.style.transform = 'translateX(0)';
                    this.hideSwipeActions(row);
                }
                
                isSwipping = false;
                startX = 0;
                currentX = 0;
            });
        });
    }

    showSwipeActions(row, direction) {
        let actionsContainer = row.querySelector('.swipe-actions');
        
        if (!actionsContainer) {
            actionsContainer = document.createElement('div');
            actionsContainer.className = 'swipe-actions';
            actionsContainer.style.cssText = `
                position: absolute;
                top: 0;
                bottom: 0;
                width: 100px;
                display: flex;
                align-items: center;
                justify-content: center;
                background: ${direction === 'left' ? 'linear-gradient(135deg, #ef4444 0%, #dc2626 100%)' : 'linear-gradient(135deg, #10b981 0%, #059669 100%)'};
                color: white;
                ${direction === 'left' ? 'right: 0' : 'left: 0'};
                font-size: 1.2rem;
                box-shadow: inset 0 0 10px rgba(0,0,0,0.2);
            `;
            
            const action = direction === 'left' ? 'delete' : 'edit';
            const icon = direction === 'left' ? 'fa-trash' : 'fa-edit';
            
            actionsContainer.innerHTML = `<i class="fas ${icon}"></i>`;
            row.style.position = 'relative';
            row.appendChild(actionsContainer);
        }
    }

    hideSwipeActions(row) {
        const actionsContainer = row.querySelector('.swipe-actions');
        if (actionsContainer) {
            actionsContainer.remove();
        }
    }

    executeSwipeAction(row, direction) {
        const action = direction === 'left' ? 'delete' : 'edit';
        
        if (action === 'delete') {
            if (typeof Swal !== 'undefined') {
                Swal.fire({
                    title: 'Hapus Data?',
                    text: 'Apakah Anda yakin ingin menghapus data ini?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#ef4444',
                    cancelButtonColor: '#6b7280',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        row.style.animation = 'slideOut 0.3s ease forwards';
                        setTimeout(() => {
                            row.remove();
                            Swal.fire('Terhapus!', 'Data berhasil dihapus.', 'success');
                        }, 300);
                    } else {
                        row.style.transform = 'translateX(0)';
                        this.hideSwipeActions(row);
                    }
                });
            } else {
                if (confirm('Hapus data ini?')) {
                    row.style.animation = 'slideOut 0.3s ease forwards';
                    setTimeout(() => row.remove(), 300);
                } else {
                    row.style.transform = 'translateX(0)';
                    this.hideSwipeActions(row);
                }
            }
        } else {
            // Edit action
            const editBtn = row.querySelector('.edit-btn, button[title*="edit"], button[title*="Edit"]');
            if (editBtn) {
                editBtn.click();
            } else {
                if (typeof Swal !== 'undefined') {
                    Swal.fire('Info', 'Fitur edit akan segera tersedia', 'info');
                }
            }
            
            row.style.transform = 'translateX(0)';
            this.hideSwipeActions(row);
        }
    }
}

// CSS Animations
const style = document.createElement('style');
style.textContent = `
    @keyframes spin {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
    
    @keyframes slideOut {
        to {
            transform: translateX(-100%);
            opacity: 0;
        }
    }
    
    .swipe-actions {
        transition: all 0.3s ease;
    }
    
    .load-more-indicator {
        position: fixed;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 1000;
    }
    
    /* Smooth scrolling */
    html {
        scroll-behavior: smooth;
    }
    
    /* Touch feedback */
    .touch-feedback:active {
        transform: scale(0.95);
        transition: transform 0.1s ease;
    }
`;
document.head.appendChild(style);

// Initialize Touch Gestures
document.addEventListener('DOMContentLoaded', () => {
    const touchGestures = new TouchGestures();
    
    // Add touch feedback to buttons
    const buttons = document.querySelectorAll('button, .btn');
    buttons.forEach(btn => {
        btn.classList.add('touch-feedback');
    });
    
    console.log('Touch Gestures initialized successfully!');
});

// Export for global use
window.TouchGestures = TouchGestures;