export type ToastType = {
  id?: number;
  title?: string;
  body: string;
  variant?: 'primary' | 'danger' | 'success' | 'warning';
  autoHideDelay?: number;
};
