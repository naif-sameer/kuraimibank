import axios from '@/helpers/axios';
import { SubCategoryType } from '@/types';

export async function getSubCategoriesApi() {
  return (await axios.get('sub-categories')).data.map((item: any) => ({
    ...item,
    is_active: !!item.is_active,

    name: JSON.parse(item.name),
    icon: `http://localhost:8000/uploads/images/${item.icon}`,
  }));
}

export async function createSubCategoryApi(data: SubCategoryType) {
  let formData = new FormData();

  formData.append('name', JSON.stringify(data.name));
  formData.append('link', data.link);
  formData.append('category_id', data.category_id);
  formData.append('icon', data.icon);

  if (data.parent_category)
    formData.append('parent_category', data.parent_category);

  return await axios.post(`sub-categories/create`, formData);
}

export async function updateSubCategoryApi(data: SubCategoryType) {
  let formData = new FormData();

  formData.append('name', JSON.stringify(data.name));
  formData.append('link', data.link);
  formData.append('category_id', data.category_id);

  if (data.parent_category)
    formData.append('parent_category', data.parent_category);

  // update icon if user select new one
  if (typeof data.icon !== 'string') formData.append('icon', data.icon);

  return await axios.post(`sub-categories/${data.id}/edit`, formData);
}

export async function deleteSubCategoryApi(id: number, is_active: boolean) {
  return await axios.put(`sub-categories/${id}/toggle`, {
    is_active: !is_active,
  });
}
