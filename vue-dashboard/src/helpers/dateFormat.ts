export const dateFormat = (data: Date | string | undefined) => {
  if (data) {
    let date = new Date(data).toLocaleDateString([], {
      year: '2-digit',
      month: '2-digit',
      day: '2-digit',
      hour: '2-digit',
      minute: '2-digit',
    });

    return date;
  }
};
