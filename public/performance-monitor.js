// Performance Monitoring Script
(function() {
    'use strict';
    
    // Performance metrics
    const metrics = {
        navigationStart: performance.timing.navigationStart,
        domContentLoaded: 0,
        loadComplete: 0,
        firstContentfulPaint: 0,
        largestContentfulPaint: 0
    };
    
    // Track DOM Content Loaded
    document.addEventListener('DOMContentLoaded', function() {
        metrics.domContentLoaded = performance.now();
        console.log('DOM Content Loaded:', metrics.domContentLoaded, 'ms');
    });
    
    // Track Load Complete
    window.addEventListener('load', function() {
        metrics.loadComplete = performance.now();
        console.log('Page Load Complete:', metrics.loadComplete, 'ms');
        
        // Calculate and log performance metrics
        logPerformanceMetrics();
    });
    
    // Track First Contentful Paint
    if ('PerformanceObserver' in window) {
        const paintObserver = new PerformanceObserver((list) => {
            for (const entry of list.getEntries()) {
                if (entry.name === 'first-contentful-paint') {
                    metrics.firstContentfulPaint = entry.startTime;
                    console.log('First Contentful Paint:', metrics.firstContentfulPaint, 'ms');
                }
                if (entry.name === 'largest-contentful-paint') {
                    metrics.largestContentfulPaint = entry.startTime;
                    console.log('Largest Contentful Paint:', metrics.largestContentfulPaint, 'ms');
                }
            }
        });
        
        paintObserver.observe({ entryTypes: ['paint', 'largest-contentful-paint'] });
    }
    
    // Log performance metrics
    function logPerformanceMetrics() {
        const totalLoadTime = metrics.loadComplete;
        const domLoadTime = metrics.domContentLoaded;
        const fcp = metrics.firstContentfulPaint;
        const lcp = metrics.largestContentfulPaint;
        
        console.log('=== PERFORMANCE METRICS ===');
        console.log('Total Load Time:', totalLoadTime.toFixed(2), 'ms');
        console.log('DOM Load Time:', domLoadTime.toFixed(2), 'ms');
        console.log('First Contentful Paint:', fcp.toFixed(2), 'ms');
        console.log('Largest Contentful Paint:', lcp.toFixed(2), 'ms');
        
        // Performance score estimation
        let score = 100;
        if (totalLoadTime > 3000) score -= 20;
        if (totalLoadTime > 5000) score -= 20;
        if (fcp > 2000) score -= 15;
        if (lcp > 2500) score -= 15;
        if (domLoadTime > 2000) score -= 10;
        
        console.log('Estimated Performance Score:', Math.max(0, score), '%');
        console.log('============================');
        
        // Send metrics to server if needed
        if (typeof window.sendMetrics === 'function') {
            window.sendMetrics(metrics);
        }
    }
    
    // Resource loading monitoring
    if ('PerformanceObserver' in window) {
        const resourceObserver = new PerformanceObserver((list) => {
            for (const entry of list.getEntries()) {
                if (entry.initiatorType === 'script' && entry.duration > 1000) {
                    console.warn('Slow script loading:', entry.name, entry.duration.toFixed(2), 'ms');
                }
                if (entry.initiatorType === 'css' && entry.duration > 500) {
                    console.warn('Slow CSS loading:', entry.name, entry.duration.toFixed(2), 'ms');
                }
            }
        });
        
        resourceObserver.observe({ entryTypes: ['resource'] });
    }
    
    // Expose metrics globally
    window.performanceMetrics = metrics;
    
})(); 