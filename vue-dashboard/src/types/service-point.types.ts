export type ServicePointType = {
  id: number;

  title: {
    ar: string;
    en: string;
  };
  address: {
    lat: number;
    lon: number;
  };

  addressDetails?: any;

  working_hours: {
    start: string;
    end: string;
  };
  phone: string;
  second_phone: string;

  city?: {
    ar: string;
    en: string;
  };

  is_active: boolean;
  updated_at?: string;
};
