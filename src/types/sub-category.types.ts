export type SubCategoryType = {
  id: number;

  name: {
    ar: string;
    en: string;
  };
  link: string;
  icon: string;
  category_id: string;
  category?: string;
  parent_category?: string;

  is_active: boolean;
  updated_at?: string;
};
