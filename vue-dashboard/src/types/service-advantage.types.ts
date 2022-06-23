export type ServiceAdvantageType = {
  id: number;

  name: {
    ar: string;
    en: string;
  };
  icon: string;
  service_id: string;

  service?: string;

  is_active: boolean;
  updated_at?: string;
};
