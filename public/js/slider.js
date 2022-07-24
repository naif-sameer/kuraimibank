/**
 * @return {HTMLElement}
 */
const el = ($el) => document.querySelector($el);

/**
 * @return {NodeListOf}
 */
const els = ($els) => document.querySelectorAll($els);

function superSlide({
  slider,
  backBtn,
  forwardBtn,
  paginationItems,
  activeClass = "active-slide",
  onSlideChange = (targetIndex, slideItem) => {},

  availableMoveMode = false,
}) {
  const slideItems = els(`${slider} > *`);

  const getDirection = () =>
    window.getComputedStyle(el(slider)).getPropertyValue("direction");

  const getItemWidth = (item) =>
    parseFloat(window.getComputedStyle(item).getPropertyValue("width"));

  let activeSlide = 0;
  let totalSlides = slideItems.length; // slide items count

  makeActiveSlide(activeSlide);

  if (backBtn)
    el(backBtn).addEventListener("click", () => changeSlideItem("back"));

  if (forwardBtn)
    el(forwardBtn).addEventListener("click", () => changeSlideItem("forward"));

  let baseAvailableMove =
    totalSlides > 0
      ? totalSlides -
        Math.round(getItemWidth(el(slider)) / getItemWidth(slideItems[0])) +
        1
      : 0;

  let availableMove = baseAvailableMove;

  function checkAvailableSlideMove(direction) {
    if (availableMove < baseAvailableMove && direction === "back")
      availableMove++;

    if (availableMove > 0 && direction === "forward") availableMove--;
  }

  function changeSlideItem(direction) {
    let targetSlide = direction === "back" ? activeSlide - 1 : activeSlide + 1;

    if (availableMoveMode) {
      checkAvailableSlideMove(direction);

      if (availableMove <= 0) return;
    }

    if (targetSlide < 0) animateSlideItem(0);
    else if (targetSlide >= totalSlides) animateSlideItem(totalSlides - 1);
    else animateSlideItem(targetSlide);
  }

  function makeActiveSlide(activeSlide) {
    slideItems.forEach((item, index) => {
      if (index === activeSlide) item.classList.add(activeClass);
      else item.classList.remove(activeClass);
    });
  }

  function animateSlideItem(target, direction = null) {
    // call onSlideChange
    onSlideChange(target, slideItems[target]);

    if (paginationItems) changeActivePaginationItem(target);

    let slideMoveWidth = getItemWidth(slideItems[target]) * target;

    let slideDirection = getDirection() === "ltr" ? "-" : "";

    makeActiveSlide(target);

    el(
      slider
    ).style.transform = `translate3d(${slideDirection}${slideMoveWidth}px, 0px, 0px)`;

    activeSlide = target;
  }

  // enable slider pagination
  function changeActivePaginationItem(index) {
    // active class
    els(paginationItems).forEach((cItem, cIndex) => {
      index === cIndex
        ? cItem.classList.add("is-active")
        : cItem.classList.remove("is-active");
    });
  }

  if (paginationItems) {
    els(paginationItems).forEach((item, index) => {
      if (index === 0) item.classList.add("is-active");

      item.addEventListener("click", () => {
        if (index >= totalSlides)
          console.warn("pagination items is more than slider items");
        else animateSlideItem(index);
      });
    });
  }

  // change slider transform when resize
  window.addEventListener("resize", () => animateSlideItem(activeSlide));
}
