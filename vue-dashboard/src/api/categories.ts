import axios from '@/helpers/axios';
import { CategoryType } from '@/types';

export async function getCategoriesApi() {
  return (await axios.get('categories')).data.map((item: any) => ({
    ...item,
    name: JSON.parse(item.name),
    is_active: !!item.is_active,
  }));
}

export async function createCategoryApi(data: CategoryType) {
  let formData = new FormData();

  formData.append('name', JSON.stringify(data.name));

  return await axios.post(`categories/create`, formData);
}

export async function updateCategoryApi(data: CategoryType) {
  return await axios.put(`/categories/${data.id}/edit`, JSON.stringify(data));
}

export async function deleteCategoryApi(id: number, is_active: boolean) {
  return await axios.put(`categories/${id}/toggle`, {
    is_active: !is_active,
  });
}
