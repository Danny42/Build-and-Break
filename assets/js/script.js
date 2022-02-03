console.clear();

const duration = s => s;
const staggerDelay = s => s;
const startAt = s => s;
const startAtLabel = label => label;
const fromStyle = style => style;
const targetStyle = style => style;
const addShowClass = className => ({ className: '+=' + (className || 'show') });

const $trigger = document.querySelector('.nav-trigger');
const $meat = document.querySelector('.nav-trigger .meat');
const $tomato = document.querySelector('.nav-trigger .tomato');
const $salad = document.querySelector('.nav-trigger .salad');

const $navWrapper = document.querySelector('.nav-container');
const $nav = document.querySelector('.nav-container .background');
const $container = document.querySelector('.nav-container .container');
const $menuLetters = document.querySelectorAll('.menu li span');
const $line = document.querySelectorAll('.nav-container .line');
const $contact = document.querySelectorAll('.nav-container .contact');
const $footerEls = document.querySelectorAll('.nav-footer .-from-bottom');
const $video = document.getElementById('hero-video');
const $videoOverlay = document.querySelector('.video-overlay');
const $menuLinks = document.querySelectorAll('.menu .link');

let isOpen = false;

const navTL = new TimelineLite({ paused: true });
navTL.
to(
// scale background
$nav,
duration(0.6),
targetStyle({ scaleY: 1 })).

addLabel('background-filled').
staggerTo(
$menuLetters,
duration(0.4),
addShowClass(),
staggerDelay(0.05)).

fromTo(
// draw line across the navigation
$line,
duration(0.8),
fromStyle({ xPercent: -100 }),
targetStyle({ xPercent: 0 }),
startAtLabel('background-filled')).

staggerFromTo(
// fade in navigation footer elements
$footerEls,
duration(0.3),
fromStyle({ y: 60 }),
targetStyle({ y: 0, opacity: 1 }),
staggerDelay(0.1),
startAtLabel('background-filled')).

to(
// fade in contact information
$contact,
duration(0.4),
addShowClass(),
startAtLabel('background-filled'));


const burgerTL = new TimelineLite({ paused: true });
burgerTL.
to(
$tomato,
duration(0.3),
targetStyle({ opacity: 0, xPercent: 150 })).

to(
$meat,
duration(0.3),
targetStyle({ rotation: 45 }),
startAt(0.2)).

to(
$salad,
duration(0.3),
targetStyle({ rotation: -45 }),
startAt(0.2));


$trigger.addEventListener('click', () => {
  // navTL.reverse();
  if (!isOpen) {
    // open it
    navTL.timeScale(1);
    navTL.play();
    burgerTL.play();
    $navWrapper.classList.toggle('-open');
  } else {
    // close it
    navTL.timeScale(2.5);
    navTL.reverse();
    burgerTL.reverse();
    $navWrapper.classList.toggle('-open');
  }
  isOpen = !isOpen;
});




/***************************************
*                                      *
*    Open a new Page from the Menu     *
*                                      *
****************************************/

const infiniteRotateTween = TweenLite.to($line, 1, {
  rotation: 360,
  paused: true,
  ease: 'Linear.easeNone',
  onComplete: _ => {
    infiniteRotateTween.restart();
  } });


const pageSwitchTL = new TimelineLite({
  paused: true });

pageSwitchTL.
to(
$line,
duration(0.5),
targetStyle({
  width: 50,
  onComplete: _ => infiniteRotateTween.play() })).


staggerTo(
$menuLetters,
duration(0.2),
targetStyle({
  className: '-=show' }),

staggerDelay(0.02),
startAt(0));


$menuLinks.forEach($link => {
  $link.addEventListener('click', _ => {
    console.log('clicked');
    pageSwitchTL.play();
  });
});
/* NAVBAR */
gsap.from(".navbar div", {
  duration: 1.5,
  delay: 1.5,
  opacity: 0,
  y: "20",
  ease: "expo.inOut",
  stagger: 1 });


/* MEDIA */
gsap.from(".media ul li", {
  duration: 1.5,
  delay: 1.5,
  stagger: 0.08,
  opacity: 0,
  x: "-20",
  ease: "expo.inOut" });


/* TEXT */
gsap.from(".text-s h1 .hide--text", {
  duration: 1.5,
  delay: 1,
  y: "100%",
  ease: "expo.inOut" });


gsap.from(".text-s h3 .hide--text", {
  duration: 1.5,
  delay: 1.2,
  y: "100%",
  ease: "expo.inOut" });


gsap.from(".text-s p .hide--text", {
  duration: 1.5,
  delay: 1.3,
  y: "200%",
  ease: "expo.inOut" });


gsap.from(".text-s h2", {
  duration: 1.5,
  delay: 1.5,
  opacity: 0,
  x: "-10000",
  ease: "expo.inOut" });


/* SPONSOR */
gsap.from(".sponsor img", {
  duration: 1.5,
  delay: 1.5,
  opacity: 0,
  y: "20",
  ease: "expo.inOut" });


gsap.from(".sponsor p", {
  duration: 1.5,
  delay: 1.6,
  opacity: 0,
  y: "20",
  ease: "expo.inOut" });


/* DISTORTION */
gsap.from(".distortion", {
  duration: 1.5,
  delay: 2,
  opacity: 0,
  y: "20",
  ease: "expo.inOut" });


/* OVERLAY */
gsap.to(".first", {
  duration: 1.5,
  delay: 0.5,
  top: "-100%",
  ease: "expo.inOut" });


gsap.to(".second", {
  duration: 1.5,
  delay: 0.6,
  top: "-100%",
  ease: "expo.inOut" });


gsap.to(".third", {
  duration: 1.5,
  delay: 0.7,
  top: "-100%",
  ease: "expo.inOut" });