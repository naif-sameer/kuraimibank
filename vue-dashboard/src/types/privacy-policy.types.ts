export type PrivacyPolicyType = {
  id: number;
  table_key?: string;
  title: {
    ar: string;
    en: string;
  };
  sub_title: {
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
