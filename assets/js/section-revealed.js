const audio = document.getElementById('myAudio');
        const audioFirst = document.getElementById('audioFirst');
        const audioSecond = document.getElementById('audioSecond');
        const audioThird = document.getElementById('audioThird');
        const audioFourth = document.getElementById('audioFourth');
        const sectionRevealed = document.getElementById('section-revealed');
        const revealedTitle = document.getElementById('revealed-title');
        const firstSection = document.getElementById('first-section');
        const secondSection = document.getElementById('second-section');
        const thirdSection = document.getElementById('third-section');
        const fourthSection = document.getElementById('fourth-section');

        let firstCount = 0;

        function firstSpoiler() {
        firstCount++;
        audio.play();
        audioFirst.play();
        audioSecond.pause();
        audioSecond.currentTime = 0;
        audioThird.pause();
        audioThird.currentTime = 0;
        audioFourth.pause();
        audioFourth.currentTime = 0;
        revealedTitle.style.filter = "brightness(20%)";
        firstSection.style.filter = "brightness(100%)";
        secondSection.style.filter = "brightness(20%)";
        thirdSection.style.filter = "brightness(20%)";
        fourthSection.style.filter = "brightness(20%)";
        sectionRevealed.style.background = "#020508";

        if (firstCount == 2) {
            revealedTitle.style.filter = "brightness(100%)";
            firstSection.style.filter = "brightness(100%)";
            secondSection.style.filter = "brightness(100%)";
            thirdSection.style.filter = "brightness(100%)";
            fourthSection.style.filter = "brightness(100%)";
            sectionRevealed.style.background = "#0d1928";

            audioFirst.pause();
            audioFirst.currentTime = 0;
            firstCount = 0;
        }
        }

        let secondCount = 0;

        function secondSpoiler() {
        secondCount++;
        audio.play();
        audioSecond.play();
        audioFirst.pause();
        audioFirst.currentTime = 0;
        audioThird.pause();
        audioThird.currentTime = 0;
        audioFourth.pause();
        audioFourth.currentTime = 0;

        revealedTitle.style.filter = "brightness(20%)";
        firstSection.style.filter = "brightness(20%)";
        secondSection.style.filter = "brightness(100%)";
        thirdSection.style.filter = "brightness(20%)";
        fourthSection.style.filter = "brightness(20%)";
        sectionRevealed.style.background = "#020508";

        if (secondCount == 2) {
            revealedTitle.style.filter = "brightness(100%)";
            firstSection.style.filter = "brightness(100%)";
            secondSection.style.filter = "brightness(100%)";
            thirdSection.style.filter = "brightness(100%)";
            fourthSection.style.filter = "brightness(100%)";
            sectionRevealed.style.background = "#0d1928";

            audioSecond.pause();
            audioSecond.currentTime = 0;
            secondCount = 0;
        }
        }

        let thirdCount = 0;

        function thirdSpoiler() {
        thirdCount++;
        audio.play();
        audioThird.play();
        audioFirst.pause();
        audioFirst.currentTime = 0;
        audioSecond.pause();
        audioSecond.currentTime = 0;
        audioFourth.pause();
        audioFourth.currentTime = 0;

        revealedTitle.style.filter = "brightness(20%)";
        firstSection.style.filter = "brightness(20%)";
        secondSection.style.filter = "brightness(20%)";
        thirdSection.style.filter = "brightness(100%)";
        fourthSection.style.filter = "brightness(20%)";
        sectionRevealed.style.background = "#020508";

        if (thirdCount == 2) {
            revealedTitle.style.filter = "brightness(100%)";
            firstSection.style.filter = "brightness(100%)";
            secondSection.style.filter = "brightness(100%)";
            thirdSection.style.filter = "brightness(100%)";
            fourthSection.style.filter = "brightness(100%)";
            sectionRevealed.style.background = "#0d1928";

            audioThird.pause();
            audioThird.currentTime = 0;
            thirdCount = 0;
        }
        }

        let fourthCount = 0;

        function fourthSpoiler() {
        fourthCount++;
        audio.play();
        audioFourth.play();
        audioFirst.pause();
        audioFirst.currentTime = 0;
        audioSecond.pause();
        audioSecond.currentTime = 0;
        audioThird.pause();
        audioThird.currentTime = 0;

        revealedTitle.style.filter = "brightness(20%)";
        firstSection.style.filter = "brightness(20%)";
        secondSection.style.filter = "brightness(20%)";
        thirdSection.style.filter = "brightness(20%)";
        fourthSection.style.filter = "brightness(100%)";
        sectionRevealed.style.background = "#020508";

        if (fourthCount == 2) {
            revealedTitle.style.filter = "brightness(100%)";
            firstSection.style.filter = "brightness(100%)";
            secondSection.style.filter = "brightness(100%)";
            thirdSection.style.filter = "brightness(100%)";
            fourthSection.style.filter = "brightness(100%)";
            sectionRevealed.style.background = "#0d1928";

            audioFourth.pause();
            audioFourth.currentTime = 0;
            fourthCount = 0;
        }
        }

        function toggleSpoiler(spoilerElement, isInvertedCollapse, isInvertedExpand) {
  let isCollapsing = spoilerElement.classList.contains('expanded');
  let heightBefore = spoilerElement.offsetHeight;
  let offsetBefore = window.pageYOffset;
  spoilerElement.classList.toggle('instant', true);
  spoilerElement.classList.toggle('expanded', !isCollapsing);
  let isScrollRequired = (isCollapsing && isInvertedCollapse) ||
    (!isCollapsing && isInvertedExpand);
  if (isScrollRequired) {
    let heightAfter = spoilerElement.offsetHeight;
    let heightDelta = heightAfter - heightBefore;
    window.scrollTo(0, offsetBefore + heightDelta);
  }
}

for (let el of document.querySelectorAll('.spoiler-btn-top')) {
  el.addEventListener('click', e => toggleSpoiler(el.parentNode));
}