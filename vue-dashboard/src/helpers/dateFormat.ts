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

export const timeFormat = (time: string) => {
  if (time === undefined) return '';

  const timeConvert = (param: number) => `${(param - 12).toFixed(2)}`.replace('.', ':');

  if (time.includes(':')) {
    let newTime = Number(time.replace(':', '.'));

    return newTime > 12 ? timeConvert(newTime) : newTime;
  }

  return Number(time) > 12 ? Number(time) - 12 : time;
};
