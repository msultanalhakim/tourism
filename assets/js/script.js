window.addEventListener('load', function () {
  window.scrollTo(0, 0); // Pindahkan ke posisi atas halaman
});

const nav = document.getElementById('navigation-bar');
const hero = document.getElementById('hero-section');

function updateTransportationClass() {
  var transportationDropdown = document.getElementById("transportation");
  var transportationClassDropdown = document.getElementById("kategori");

  // Reset the transportation class dropdown
  transportationClassDropdown.innerHTML = '<option value="" disabled selected> Transport Class</option>';

  // Enable or disable the transportation class dropdown based on the selected transportation
  if (transportationDropdown.value === "Train") {
      // If Train is selected, allow both Ekonomi and Eksekutif classes
      transportationClassDropdown.innerHTML += '<option value="Ekonomi">Ekonomi</option>';
      transportationClassDropdown.innerHTML += '<option value="Eksekutif">Eksekutif</option>';
  } else {
      // If Vehicle or Airline is selected, only allow Ekonomi class
      transportationClassDropdown.innerHTML += '<option value="Ekonomi">Ekonomi</option>';
  }
  // Call the function to update the Hotel Class dropdown as well
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

/* Index.php */
document.addEventListener("DOMContentLoaded", function () {
  const navToggle = document.getElementById("nav-toggle");
  const navList = document.querySelector("nav ul");
  const navigationBar = document.getElementById("navigation-bar");
  const windowHeight = 450;
  const galleryHeight = 1630;
  const articleHeight = 2200;
  const currentWidth = document.documentElement.clientWidth;
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
      if (currentWidth < 900) {
        navigationBar.classList.remove("transparent");
      } else {
        navigationBar.classList.add("transparent");
      }
    } else {
      navigationBar.classList.remove("transparent");
    }
  }

  function articleScroll() {
    if (window.scrollY > articleHeight) {
      if (currentWidth < 900) {
        navigationBar.classList.remove("transparent");
        navigationBar.classList.remove("none");
      } else {
        navigationBar.classList.remove("transparent");
        navigationBar.classList.add("none");
      }
    } else if (window.scrollY > galleryHeight && window.scrollY < articleHeight) {
      if (currentWidth < 900) {
        navigationBar.classList.remove("transparent");
        navigationBar.classList.remove("none");
      } else {
        navigationBar.classList.add("transparent");
        navigationBar.classList.remove("none");
      }
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
        }
      }, 2400
    );

  }

  function galleryTransition() {
    let destinationHeader = document.querySelector(".destination-header");
    let destinationParagraph = document.querySelector(".destination-paragraph");
    let galleryImage = document.getElementById("gallery-image");
    let scrollPosition = window.scrollY;
    let windowHeight = 1140;

    setTimeout(
      function () {
        if (scrollPosition > windowHeight) {
          destinationHeader.classList.add("show");
          destinationParagraph.classList.add("show");
        }
      }, 600
    );

    setTimeout(
      function () {
        if (destinationParagraph.classList.contains("show")) {
          galleryImage.classList.add("show");
        }
      }, 1300
    );
  }


  function articleTransition() {
    let articleTitle = document.querySelector(".article-title");
    let listFirst = document.querySelector(".list-first");
    let listSecond = document.querySelector(".list-second");
    let listThird = document.querySelector(".list-third");
    let arrowHome = document.querySelector(".arrow-home");
    let scrollPosition = window.scrollY;
    let windowHeight = 1600;
    let arrowHeight = 1600;

    if (scrollPosition > arrowHeight) {
      arrowHome.classList.add("display");
    } else {
      arrowHome.classList.remove("display");
    }
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
      }, 2900
    );
    setTimeout(
      function () {
        if (listSecond.classList.contains("show")) {
          listThird.classList.add("show");
        }
      }, 3800
    );
  }

  window.addEventListener("scroll", function () {
    displayTransition();
    galleryTransition();
    articleTransition();
  });
});

function homeSection() {
  window.scrollTo({
    top: 0,
    behavior: 'smooth' // Animasi scroll
  });
}

function articleSection() {
  let currentWidth = document.documentElement.clientWidth;
  if (currentWidth > 1900) {
    window.scrollTo({
      top: 3850,
      behavior: 'smooth' // Animasi scroll
    });
  } else if (currentWidth > 1500) {
    window.scrollTo({
      top: 2580,
      behavior: 'smooth' // Animasi scroll
    });
  } else if (currentWidth > 1200) {
    window.scrollTo({
      top: 2255,
      behavior: 'smooth' // Animasi scroll
    });
  } else if (currentWidth > 900) {
    window.scrollTo({
      top: 4180,
      behavior: 'smooth' // Animasi scroll
    });
  } else if (currentWidth < 900) {
    window.scrollTo({
      top: 4150,
      behavior: 'smooth' // Animasi scroll
    });
  }
}

function destinationSection() {
  let currentWidth = document.documentElement.clientWidth;
  if (currentWidth > 1900) {
    window.scrollTo({
      top: 2850,
      behavior: 'smooth' // Animasi scroll
    });
  } else if (currentWidth > 1500) {
    window.scrollTo({
      top: 1650,
      behavior: 'smooth' // Animasi scroll
    });
  } else if (currentWidth > 1200) {
    window.scrollTo({
      top: 1455,
      behavior: 'smooth' // Animasi scroll
    });
  } else if (currentWidth > 900) {
    window.scrollTo({
      top: 2650,
      behavior: 'smooth' // Animasi scroll
    });
  } else if (currentWidth < 900) {
    window.scrollTo({
      top: 1380,
      behavior: 'smooth' // Animasi scroll
    });
  }
}

let dropdownClick = 0;

function trackTrips(){
  let modal = document.getElementById("myModal");
  let btn = document.getElementById("tracking");
  let span = document.getElementsByClassName("close")[0];
  let myDropdown = document.getElementById("myDropdown");

  btn.onclick = function () {
    modal.style.display = "block";
    if (myDropdown.classList.contains('show')) {
      myDropdown.classList.remove('show');
      dropdownClick = 1;
    }
  }
  span.onclick = function () {
    modal.style.display = "none";
    dropdownClick = 1;
  }
  window.onclick = function (event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
}

// Fungsi yang tidak perlu menambahkan event listener
function dropdownNav() {
    let myDropdown = document.getElementById("myDropdown");
  
    // Mengecek apakah yang diklik bukan bagian dari dropdown
    if (!event.target.matches('.dropbtn')) {
      if (dropdownClick === 0) {
        myDropdown.classList.add('show');
        dropdownClick = 1;
      } else {
        myDropdown.classList.remove('show');
        dropdownClick = 0;
      }
    }
}

