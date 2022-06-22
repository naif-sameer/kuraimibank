import axios from '@/helpers/axios';
import { NewsType } from '@/types';

export async function getNewsApi() {
  return (await axios.get('news')).data.map((item: any) => ({
    ...item,
    is_active: !!item.is_active,

    title: JSON.parse(item.title),
    description: JSON.parse(item.description),
    image: `http://localhost:8000/uploads/images/${item.image}`,
  }));
}

export async function createNewsApi(data: NewsType) {
  let formData = new FormData();

  formData.append('title', JSON.stringify(data.title));
  formData.append('description', JSON.stringify(data.description));

  formData.append('image', data.image);

  return await axios.post(`news/create`, formData);
}

export async function updateNewsApi(data: NewsType) {
  let formData = new FormData();

  formData.append('title', JSON.stringify(data.title));
  formData.append('description', JSON.stringify(data.description));

  // add image if user select new one
  if (data.image !== 'string') formData.append('image', data.image);

  return await axios.post(`/news/${data.id}/edit`, formData);
}

export async function deleteNewsApi(id: number, is_active: boolean) {
  return await axios.put(`news/${id}/toggle`, {
    is_active: !is_active,
  });
}
