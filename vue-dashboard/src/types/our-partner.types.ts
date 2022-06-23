export type OurPartnerType = {
  id: number;

  title: {
    ar: string;
    en: string;
  };
  description: {
    ar: string;
    en: string;
  };
  image: string;

  is_active: boolean;
  updated_at?: string;
};
