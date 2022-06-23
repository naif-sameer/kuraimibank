export type JobType = {
  id: number;
  title: {
    ar: string;
    en: string;
  };
  description: {
    ar: string;
    en: string;
  };
  is_active: boolean;
  updated_at?: string;
};
