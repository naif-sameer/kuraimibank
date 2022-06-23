import axios from '@/helpers/axios';
import { SocialMediaType } from '@/types';

export async function getSocialMediaApi() {
  return (await axios.get('social-media')).data.map((item: any) => ({
    ...item,
    is_active: !!item.is_active,
    icon: `http://localhost:8000/uploads/images/${item.icon}`,
  }));
}

export async function createSocialMediaApi(data: SocialMediaType) {
  let formData = new FormData();

  formData.append('name', data.name);
  formData.append('link', data.link);
  formData.append('icon', data.icon);

  return await axios.post(`social-media/create`, formData);
}

export async function updateSocialMediaApi(data: SocialMediaType) {
  let formData = new FormData();

  formData.append('name', data.name);
  formData.append('link', data.link);

  // add icon if user select new one

  if (typeof data.icon !== 'string') formData.append('icon', data.icon);

  return await axios.post(`/social-media/${data.id}/edit`, formData);
}

export async function deleteSocialMediaApi(id: number, is_active: boolean) {
  return await axios.put(`social-media/${id}/toggle`, {
    is_active: !is_active,
  });
}
