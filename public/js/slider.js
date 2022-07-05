/**
 * @return {HTMLElement}
 */
const el = ($el) => document.querySelector($el);

/**
 * @return {NodeListOf}
 */
const els = ($els) => document.querySelectorAll($els);

function superSlide({
  slide,
  backBtn,
  forwardBtn,
  paginationItems,
  activeClass = "active-slide",
}) {
  const slideItems = els(`${slide} > *`);

  const getDirection = () =>
    window.getComputedStyle(el(slide)).getPropertyValue("direction");

  const getSliderWidth = (item) =>
    window.getComputedStyle(item).getPropertyValue("width");

  let activeSlide = 0;
  let totalSlides = slideItems.length; // slide items count

  makeActiveSlide(activeSlide);

  if (backBtn)
    el(backBtn).addEventListener("click", () => changeSlideItem("back"));

  if (forwardBtn)
    el(forwardBtn).addEventListener("click", () => changeSlideItem("forward"));

  function changeSlideItem(direction) {
    let targetSlide = direction === "back" ? activeSlide - 1 : activeSlide + 1;

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

  function animateSlideItem(target) {
    if (paginationItems) changeActivePaginationItem(target);

    let slideWidth = parseFloat(getSliderWidth(slideItems[target])) * target;
    let slideDirection = getDirection() === "ltr" ? "-" : "";

    makeActiveSlide(target);

    el(
      slide
    ).style.transform = `translate3d(${slideDirection}${slideWidth}px, 0px, 0px)`;

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
