export type ServiceType = {
  id: number;

  title: {
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
  service_id: string;

  sub_services?: Array<ServiceType>;
  service?: string;
  service_advantages?: Array<any>;

  is_active: boolean;
  updated_at?: string;
};
