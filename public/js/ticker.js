const superTicker = ({ item }) => {
  els(item).forEach((element, index) => {
    const itemContent = element.innerHTML;
    element.innerHTML = `${itemContent} ${itemContent}`;

    [].forEach.call(element.children, (childElement) => {
      console.log(childElement);
      if (index % 2 === 0) childElement.style.animationDirection = "reverse";
    });
  });
};
