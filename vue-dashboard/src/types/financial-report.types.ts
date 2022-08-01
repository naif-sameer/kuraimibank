export type FinancialReportType = {
  id: number;

  title: {
    ar: string;
    en: string;
  };
  pdf: string;

  is_active: boolean;
  updated_at?: string;
};
