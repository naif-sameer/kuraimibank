export type ServiceAdvantageType = {
  id: number;

  title: {
    ar: string;
    en: string;
  };
  description: {
    ar: string;
    en: string;
  };
  service_id: string;

  is_active: boolean;
  updated_at?: string;
};
