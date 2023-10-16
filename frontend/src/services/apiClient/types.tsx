  export interface ClientInterface {
    codigo: number;
    empresa: number;
    tipo: string;
    cpf_cnpj: string;
    razao_social: string;
  }

  export interface ClientStoreUpdateInterface {
    codigo?: number;
    empresa: number;
    tipo: string;
    cpf_cnpj: string;
    razao_social: string;
  }