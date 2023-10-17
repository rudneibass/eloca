  export interface CompanyInterface {
    codigo: number;
    recnum: number;
    empresa: number;
    sigla: string;
    razao_social: string;
  }

  export interface CompanyStoreUpdateInterface {
    codigo?: number;
    empresa: number;
    sigla: string;
    razao_social: string;
  }