export type ToastType = {
  id?: number;
  body: string;
  title: string;
  variant?: 'primary' | 'danger' | 'success' | 'warning';
  autoHideDelay?: number;
};
