import axios from '@/helpers/axios';
import { NewsType } from '@/types';

export async function getNewsApi() {
  return (await axios.get('news')).data.data;
}

export async function createNewsApi(data: NewsType) {
  let formData = new FormData();

  formData.append('title', JSON.stringify(data.title));
  formData.append('description', JSON.stringify(data.description));
  formData.append('image', data.image);

  return await axios.post(`news`, formData);
}

export async function updateNewsApi(data: NewsType) {
  let formData = new FormData();

  formData.append('title', JSON.stringify(data.title));
  formData.append('description', JSON.stringify(data.description));

  // add image if user select new one
  if (typeof data.image !== 'string') formData.append('image', data.image);

  return await axios.post(`/news/${data.id}`, formData);
}

export async function deleteNewsApi(id: number, is_active: boolean) {
  return await axios.put(`news/${id}/toggle`, {
    is_active: !is_active,
  });
}
