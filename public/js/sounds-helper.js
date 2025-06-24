/**
 * Sound Helper for NEEPCO AMS
 * Provides global functions to play sounds throughout the application
 */

// Initialize sound manager if not already defined
if (typeof document.soundManager === 'undefined') {
    console.warn('SoundManager not found. Make sure sounds.js is loaded before sounds-helper.js');
    
    // Create a minimal fallback
    document.soundManager = {
        play: function() {},
        enabled: false,
        toggle: function() {}
    };
}

// Global sound functions
window.playSound = {
    success: function() {
        if (typeof document.soundManager !== 'undefined') {
            document.soundManager.play('success');
        }
    },
    error: function() {
        if (typeof document.soundManager !== 'undefined') {
            document.soundManager.play('error');
        }
    },
    lock: function() {
        if (typeof document.soundManager !== 'undefined') {
            document.soundManager.play('lock');
        }
    }
};

// Play success sound on form submissions
$(document).on('ajax:success', function(event, data, status, xhr) {
    if (data && (data.status === 'success' || data.success === true)) {
        playSound.success();
    }
});

// Play error sound on AJAX errors
$(document).on('ajax:error', function(event, xhr, status, error) {
    playSound.error();
});

// Play lock sound on lock/unlock actions
$(document).on('click', '[data-action="lock"], [data-action="unlock"]', function() {
    playSound.lock();
});
