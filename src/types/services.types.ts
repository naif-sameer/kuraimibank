export type ServiceType = {
  id: number;

  name: {
    ar: string;
    en: string;
  };
  description: {
    ar: string;
    en: string;
  };
  other_advantage: {
    ar: string;
    en: string;
  };
  service_conditions: {
    ar: string;
    en: string;
  };
  image: string;
  category_id: string;

  category?: string;

  is_active: boolean;
  updated_at?: string;
};
