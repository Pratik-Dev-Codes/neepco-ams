/**
 * Sound Manager for NEEPCO AMS
 * Handles playing sound effects based on user preferences
 */

class SoundManager {
    constructor() {
        this.sounds = {
            success: new Audio('/sounds/success.mp3'),
            error: new Audio('/sounds/error.mp3'),
            lock: new Audio('/sounds/lock.mp3')
        };
        this.enabled = false;
        this.initialize();
    }

    initialize() {
        // Check if sounds are enabled from localStorage or user preference
        const soundPref = localStorage.getItem('enable_sounds');
        this.enabled = soundPref ? soundPref === 'true' : false;

        // Preload sounds
        Object.values(this.sounds).forEach(sound => {
            sound.load();
            sound.volume = 0.5; // Set default volume to 50%
        });
    }


    play(soundName) {
        if (!this.enabled) return;
        
        const sound = this.sounds[soundName];
        if (sound) {
            // Reset sound to start if already playing
            sound.currentTime = 0;
            sound.play().catch(e => console.warn('Could not play sound:', e));
        }
    }

    toggle(enabled) {
        this.enabled = enabled;
        localStorage.setItem('enable_sounds', enabled);
    }
}

// Initialize sound manager
document.soundManager = new SoundManager();

// Play sounds for common events
document.addEventListener('DOMContentLoaded', () => {
    // Play success sound on successful form submissions
    document.addEventListener('ajax:success', (event) => {
        if (event.detail && event.detail.success) {
            document.soundManager.play('success');
        }
    });

    // Play error sound on form errors
    document.addEventListener('ajax:error', () => {
        document.soundManager.play('error');
    });

    // Play lock sound when locking/unlocking
    document.addEventListener('lock-action', () => {
        document.soundManager.play('lock');
    });
});
