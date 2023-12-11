const audio = document.getElementById('myAudio');
const audioFirst = document.getElementById('audioFirst');
const audioSecond = document.getElementById('audioSecond');
const audioThird = document.getElementById('audioThird');
const audioFourth = document.getElementById('audioFourth');
const nav = document.getElementById('navigation-bar');
const hero = document.getElementById('hero-container');
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

  nav.style.filter = "brightness(20%)";
  hero.style.filter = "brightness(20%)";
  revealedTitle.style.filter = "brightness(20%)";
  firstSection.style.filter = "brightness(100%)";
  secondSection.style.filter = "brightness(20%)";
  thirdSection.style.filter = "brightness(20%)";
  fourthSection.style.filter = "brightness(20%)";
  sectionRevealed.style.background = "#020508";

  if (firstCount == 2) {
    nav.style.filter = "brightness(100%)";
    hero.style.filter = "brightness(100%)";
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

  nav.style.filter = "brightness(20%)";
  hero.style.filter = "brightness(20%)";
  revealedTitle.style.filter = "brightness(20%)";
  firstSection.style.filter = "brightness(20%)";
  secondSection.style.filter = "brightness(100%)";
  thirdSection.style.filter = "brightness(20%)";
  fourthSection.style.filter = "brightness(20%)";
  sectionRevealed.style.background = "#020508";

  if (secondCount == 2) {
    nav.style.filter = "brightness(100%)";
    hero.style.filter = "brightness(100%)";
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

  nav.style.filter = "brightness(20%)";
  hero.style.filter = "brightness(20%)";
  revealedTitle.style.filter = "brightness(20%)";
  firstSection.style.filter = "brightness(20%)";
  secondSection.style.filter = "brightness(20%)";
  thirdSection.style.filter = "brightness(100%)";
  fourthSection.style.filter = "brightness(20%)";
  sectionRevealed.style.background = "#020508";

  if (thirdCount == 2) {
    nav.style.filter = "brightness(100%)";
    hero.style.filter = "brightness(100%)";
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

  nav.style.filter = "brightness(20%)";
  hero.style.filter = "brightness(20%)";
  revealedTitle.style.filter = "brightness(20%)";
  firstSection.style.filter = "brightness(20%)";
  secondSection.style.filter = "brightness(20%)";
  thirdSection.style.filter = "brightness(20%)";
  fourthSection.style.filter = "brightness(100%)";
  sectionRevealed.style.background = "#020508";

  if (fourthCount == 2) {
    nav.style.filter = "brightness(100%)";
    hero.style.filter = "brightness(100%)";
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


setInterval(function () {
  let web = document.getElementById('web');
  let graphics = document.getElementById('graphics');
  let photography = document.getElementById('photography');
  let certificate = document.getElementById('certificate');

  if (web.checked) {
    web.checked = false;
    graphics.checked = true;
  } else if (graphics.checked) {
    graphics.checked = false;
    photography.checked = true;
  } else if (photography.checked) {
    photography.checked = false;
    certificate.checked = true;
  } else if (certificate.checked) {
    certificate.checked = false;
    web.checked = true;
  }
}, 5000);

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


/* Index.php */
document.addEventListener("DOMContentLoaded", function () {
  const navToggle = document.getElementById("nav-toggle");
  const navList = document.querySelector("nav ul");
  const navigationBar = document.getElementById("navigation-bar");
  const windowHeight = 450;
  const galleryHeight = 1620;
  const articleHeight = 2200;
  let isSticky = false;

  navToggle.addEventListener("click", function () {
    navList.classList.toggle("show");
  });

  function handleScroll() {
    const shouldBeSticky = window.scrollY > windowHeight;
    if (shouldBeSticky !== isSticky) {
      isSticky = shouldBeSticky;
      if (isSticky) {
        navigationBar.classList.add("sticky");
      } else {
        navigationBar.classList.remove("sticky");
        navigationBar.classList.add("slide-up");
        setTimeout(function () {
          navigationBar.classList.remove("slide-up");
        }, 500); // Sesuaikan dengan durasi animasi
      }
    }
  }

  function galleryScroll() {
    if (window.scrollY > galleryHeight) {
      navigationBar.classList.add("transparent");
    } else {
      navigationBar.classList.remove("transparent");
    }
  }

  function articleScroll() {
    if (window.scrollY > articleHeight) {
      navigationBar.classList.remove("transparent");
      navigationBar.classList.add("none");
    } else if (window.scrollY > galleryHeight && window.scrollY < articleHeight) {
      navigationBar.classList.add("transparent");
      navigationBar.classList.remove("none");
    } else if (window.scrollY < windowHeight) {
      navigationBar.classList.remove("none");
    } else if (window.scrollY < articleHeight) {
      navigationBar.classList.remove("none");
    }
  }


  window.addEventListener("scroll", function () {
    handleScroll();
    galleryScroll();
    articleScroll();
  });
});

let hasDisplayed = false;
let galleryDisplayed = false;

document.addEventListener("scroll", function () {
  let displayTitle = document.querySelector(".display-title");
  let displayLogo = document.getElementById("display-logo");
  let displayParagraph = document.getElementById("display-paragraph");
  let displayFooter = document.getElementById("display-footer");
  let floatingBar = document.getElementById("floating-bar");
  let scrollPosition = window.scrollY;
  let windowHeight = 500;

  function displayTransition() {
    if (scrollPosition > windowHeight) {
      displayLogo.classList.add("show");
    }
    setTimeout(
      function () {
        if (displayLogo.classList.contains("show")) {
          displayParagraph.classList.add("show");
        }
      }, 1000
    );

    setTimeout(
      function () {
        if (displayParagraph.classList.contains("show")) {
          displayFooter.classList.add("show");
        }
      }, 1800
    );

    setTimeout(
      function () {
        if (displayFooter.classList.contains("show")) {
          floatingBar.classList.add("show");
          hasDisplayed = true;
        }
      }, 2400
    );

  }

  if (hasDisplayed) {
    function galleryTransition() {
      let destinationHeader = document.querySelector(".destination-header");
      let destinationParagraph = document.querySelector(".destination-paragraph");
      let galleryImage = document.getElementById("gallery-image");
      let scrollPosition = window.scrollY;
      let windowHeight = 800;

      setTimeout(
        function () {
          if (scrollPosition > windowHeight) {
            destinationHeader.classList.add("show");
            destinationParagraph.classList.add("show");
          }
        }, 400
      );

      setTimeout(
        function () {
          if (destinationParagraph.classList.contains("show")) {
            galleryImage.classList.add("show");
            galleryDisplayed = true;
          }
        }, 1000
      );
    }
    galleryTransition();
  }

  if (galleryDisplayed) {
    function articleTransition() {
      let articleTitle = document.querySelector(".article-title");
      let listFirst = document.querySelector(".list-first");
      let listSecond = document.querySelector(".list-second");
      let listThird = document.querySelector(".list-third");
      let scrollPosition = window.scrollY;
      let windowHeight = 1600;

      // Menentukan kapan animasi harus dimulai
      if (scrollPosition > windowHeight) {
        articleTitle.classList.add("show");
      }
      setTimeout(
        function () {
          if (articleTitle.classList.contains("show")) {
            listFirst.classList.add("show");
          }
        }, 2000
      );

      setTimeout(
        function () {
          if (listFirst.classList.contains("show")) {
            listSecond.classList.add("show");
          }
        }, 3200
      );
      setTimeout(
        function () {
          if (listSecond.classList.contains("show")) {
            listThird.classList.add("show");
          }
        }, 4400
      );
    }
    articleTransition();
  }

  window.addEventListener("scroll", function () {
    displayTransition();
    articleScroll();
  });
});

document.addEventListener("scroll", function () {

});
