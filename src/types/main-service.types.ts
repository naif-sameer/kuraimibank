export type MainServiceType = {
  id: number;

  name: {
    ar: string;
    en: string;
  };
  link: string;
  image: string;

  is_active: boolean;
  updated_at?: string;
};
