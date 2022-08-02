import axios from '@/helpers/axios';
import { OurPartnerType } from '@/types';

export async function getOurPartnersApi() {
  return (await axios.get('our-partners')).data.data;
}

export async function createOurPartnerApi(data: OurPartnerType) {
  let formData = new FormData();

  formData.append('title', JSON.stringify(data.title));
  formData.append('description', JSON.stringify(data.description));
  formData.append('image', data.image);

  return await axios.post(`our-partners`, formData);
}

export async function updateOurPartnerApi(data: OurPartnerType) {
  let formData = new FormData();

  formData.append('title', JSON.stringify(data.title));
  formData.append('description', JSON.stringify(data.description));

  // add image if user select new one
  if (typeof data.image !== 'string') formData.append('image', data.image);

  return await axios.post(`/our-partners/${data.id}`, formData);
}

export async function deleteOurPartnerApi(id: number, is_active: boolean) {
  return await axios.put(`our-partners/${id}/toggle`, {
    is_active: !is_active,
  });
}
