document.addEventListener('DOMContentLoaded', () => {
    const steps = [
        { title: "Need more clients and a lead-magnet website?" },
        { title: "Want organic traffic that converts?" },
        { title: "Imagine those visitors becoming loyal customers." },
        { title: "Picture your business standing out online." },
        { title: "Ready for the 1st page? Let’s go!" }
    ];

    const phraseSectionWrapper = document.getElementById('phrase-section-wrapper');
    const phraseLoadingWrapper = document.getElementById('phrase-loading-wrapper');
    const content = document.getElementById('content');
    let stepCount = 0;

    function updatePhrases() {
        // Remove previous phrase
        const previousPhrase = document.querySelector('.phrase-animation.show');
        if (previousPhrase) {
            previousPhrase.classList.remove('show');
            previousPhrase.classList.add('hide');
            setTimeout(() => {
                phraseSectionWrapper.removeChild(previousPhrase);
            }, 850); // Match duration of slideOut animation
        }

        // Add new phrase
        if (stepCount < steps.length) {
            const step = steps[stepCount];
            const phraseDiv = document.createElement('div');
            phraseDiv.className = 'phrase-animation show';
            const phraseText = document.createElement('h1');
            phraseText.textContent = step.title;
            phraseDiv.appendChild(phraseText);
            phraseSectionWrapper.appendChild(phraseDiv);

            // Increment the step count
            stepCount++;
        } else {
            clearInterval(interval);
        }
    }

    // Update phrases every 1500ms
    const interval = setInterval(updatePhrases, 1500);

    // Calculate total animation duration
    const animationDuration = 850; // Duration of each animation step
    const totalAnimationDuration = (animationDuration + 650) * steps.length; // Total duration of all animations plus final delay

    // Show the loader and hide content initially
    phraseLoadingWrapper.style.display = 'flex';
    content.style.display = 'none';

    // Hide the loader after all animations are completed
    setTimeout(() => {
        phraseLoadingWrapper.style.display = 'none';
        content.style.display = 'block';
    }, totalAnimationDuration);

    // Initial call to populate the phrases
    updatePhrases();
});
