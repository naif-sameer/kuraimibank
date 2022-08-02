import axios from '@/helpers/axios';
import { SocialMediaType } from '@/types';

export async function getSocialMediaApi() {
  return (await axios.get('social-media')).data.data;
}

export async function createSocialMediaApi(data: SocialMediaType) {
  let formData = new FormData();

  formData.append('title', data.title);
  formData.append('link', data.link);
  formData.append('icon', data.icon);

  return await axios.post(`social-media`, formData);
}

export async function updateSocialMediaApi(data: SocialMediaType) {
  let formData = new FormData();

  formData.append('title', data.title);
  formData.append('link', data.link);

  // add icon if user select new one

  if (typeof data.icon !== 'string') formData.append('icon', data.icon);

  return await axios.post(`/social-media/${data.id}`, formData);
}

export async function deleteSocialMediaApi(id: number, is_active: boolean) {
  return await axios.put(`social-media/${id}/toggle`, {
    is_active: !is_active,
  });
}
