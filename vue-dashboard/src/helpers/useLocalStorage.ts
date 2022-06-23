export const useLocalStorage = (itemName: string) => {
  let getData = (): Array<object> => {
    let item = localStorage.getItem(itemName);

    if (item) return JSON.parse(item);

    return [];
  };

  let setData = (data: []) =>
    localStorage.setItem(itemName, JSON.stringify(data));

  return {
    getData,
    setData,
  };
};
