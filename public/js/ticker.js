const superTicker = ({ item }) => {
  els(item).forEach((element) => (element.innerHTML += element.innerHTML));
};
