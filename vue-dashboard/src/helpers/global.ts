export const getUniqueID = () => {
  return Math.floor(Math.random() * Date.now()) + Date.now();
};
