import axios from 'axios';

axios.defaults.baseURL = 'http://localhost:8080/api';

export interface Tattoo {
  id: number;
  name: string;
  description: string;
  createdAt: string;
  updatedAt: string;
}

export const getTattoos = async (): Promise<Tattoo[]> => {
  const response = await axios.get('/tattoos');
  return response.data;
};
