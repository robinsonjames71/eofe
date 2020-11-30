import Rellax from 'rellax'
require('waypoints/lib/noframework.waypoints.min');

(function() {

  var docHeight = document.documentElement.clientHeight;
  var docWidth = document.documentElement.clientWidth;

  var triggerOffset = docHeight / 2;
  var sceneStart = docHeight / 2;
  var duration = docHeight * 2 - (docHeight / 2);

  var navOffset = 50;
  var gifPos = '0%';
  var waypointOffset = 0;
  var requestId = null;
  var textOffset = '42%';

  if (docWidth < 768) {
    navOffset = 10;
    gifPos = '0%';
    waypointOffset = 300;
  }
  if (docWidth >= 768 && docWidth < 1025) {
    waypointOffset = 200;
    navOffset = 20;
    textOffset = '52%';
  }

  if (document.querySelector('.eoe-opener')) {

    var startCoords = {
      'latitude': 28.671361,
      'longitude': 153.588515
    }
    var endCoords = {
      'latitude': 28.6363,
      'longitude': 153.6377
    }
  
    gsap.registerPlugin(MotionPathPlugin, TextPlugin);
  
    // gsap.set(".button", {
    //   left: 25,
    //   top: '80vh',
    // });
  
    gsap.set(".eoe-opener .eoe-animation img, .eoe-opener .eoe-animation h2", {
      bottom: '-150%',
    });
  
    gsap.set(".eoe-opener .timeline-trigger", {
      top: triggerOffset
    });
  
    gsap.set(".eoe-opener .start-trigger", {
      top: sceneStart
    });
  
    gsap.set(".eoe-opener .end-trigger", {
      top: sceneStart + duration
    });
  
    gsap.set(".nav-main", {
      top: docHeight + 100
    });
  
    // "SCROLL MAGIC"!!!
    var tl = gsap.timeline({ paused: true })
      .to(".eoe-opener .gps-button", {
        duration: duration,
        motionPath: {
          path: "#path",
          align: "#path",
          alignOrigin: [0.5, 0.5]
        }
      }, sceneStart)
      .to(startCoords, {
        duration: duration,
        latitude: endCoords.latitude,
        onUpdate: function() {
          document.querySelector('.eoe-opener .latitude').innerHTML = startCoords.latitude
        }
      }, sceneStart)
      .to(startCoords, {
        duration: duration,
        longitude: endCoords.longitude,
        onUpdate: function() {
          document.querySelector('.eoe-opener .longitude').innerHTML = startCoords.longitude
        }
      }, sceneStart)
      .addLabel('colour-pop')
      .to(".eoe-opener #Fill-3", {
        fill: '#57937A',
      }, 'colour-pop')
      .to(".eoe-opener #Stroke-5", {
        stroke: '#57937A',
      }, 'colour-pop')
      .to('.eoe-opener .text', {
        color: '#689a87'
      }, 'colour-pop')
      .addLabel('end-gps')
      .to('.eoe-opener .text h1:first-child', {
        delay: docHeight / 2,
        duration: docHeight / 2,
        text: 'east. of',
        ease: 'none'
      }, 'end-gps')
      .to('.eoe-opener .text h1:last-child', {
        duration: docHeight / 2,
        text: 'everything',
        ease: 'none'
      })
      .to('.eoe-opener .text, .eoe-opener .gps-button', {
        duration: docHeight / 2,
        top: '-100%',
        ease: 'none'
      })
      .addLabel('gif-reveal')
      .to('.eoe-opener .eoe-animation img', {
        delay: -docHeight / 4,
        duration: docHeight / 2,
        bottom: '10%',
      }, 'gif-reveal')
      .to('.eoe-opener .eoe-animation h2', {
        delay: -docHeight / 2,
        duration: docHeight / 2,
        bottom: textOffset,
      }, 'gif-reveal')
      .to('.nav-main', {
        duration: docHeight / 2,
        top: navOffset,
        ease: 'none'
      })
      // .to('.eoe-opener .eoe-animation', {
      //   delay: docHeight / 2,
      //   position: 'absolute',
      //   bottom: gifPos
      // })

    var aniBlock = document.querySelector('.eoe-opener');
    var aniGif = aniBlock.querySelector('.eoe-opener .eoe-animation');
    var aniBlockBot = aniBlock.style.bottom;
    const animationWaypoint = new Waypoint({
      element: aniBlock,
      handler: (direction) => {
        console.log({direction})
        if (direction === 'down') {
          aniGif.style.position = 'absolute'
          aniGif.style.bottom = gifPos
        }
        if (direction === 'up') {
          aniGif.style.position = 'fixed'
          aniGif.style.bottom = '0%'
        }
      },
      offset: 'bottom-in-view'
    });
    
    // Only update on animation frames
    window.addEventListener("scroll", function() {
      if (!requestId) {
        requestId = requestAnimationFrame(update);
      }
    });
  
    update();
  
    // Set timeline time to scrollTop
    function update() {
      tl.time(window.pageYOffset + triggerOffset);
      requestId = null;
    }
  
  }

  // Rellax for parallax effects
  if (docWidth > 768) {
    var rellax = new Rellax('.rellax', {
      center: true
    });
  }

  // Get all "navbar-burger" elements
  const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

  // Check if there are any navbar burgers
  if ($navbarBurgers.length > 0) {

    // Add a click event on each of them
    $navbarBurgers.forEach( el => {
      el.addEventListener('click', () => {

        // Get the target from the "data-target" attribute
        const target = el.dataset.target;
        const $target = document.getElementById(target);

        // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
        el.classList.toggle('is-active');
        $target.classList.toggle('is-active');

      });
    });
  }

  // Get navigation links
  const navLinks = Array.from(document.querySelectorAll('.navbar-menu .navbar-item a')).map(navitem => {
    return navitem.getAttribute('href');
  })

  // Get the custom blocks
  const blocks = document.querySelectorAll('.eoe-block');

  // Remove and add active class
  const activateMenu = (blockId) => {
    document.querySelectorAll('.navbar-menu .navbar-item').forEach(navItem => navItem.classList.remove('is-active'));
    const menuLink = document.querySelector(`.navbar-item a[href='#${blockId}']`).parentElement;
    menuLink.classList.add('is-active');
  }

  // Add waypoint to each block
  blocks.forEach(block => {
    block.classList.add('inactive');
    const waypoint = new Waypoint({
      element: block,
      handler: (direction) => {
        // console.log(block)
        var bg = block.querySelector('.background')
        var rellax = new Rellax(bg, {
          speed: 2,
          center: true
        });

        // block.classList.remove('inactive');
        // if (block.id && navLinks.includes(`#${block.id}`)) {
        //   activateMenu(block.id);
        // }
      },
    });
  })

})();