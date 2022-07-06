import axios from '@/helpers/axios';
import { OurPartnerType } from '@/types';

export async function getOurPartnersApi() {
  return (await axios.get('our-partners')).data.map((item: any) => ({
    ...item,
    is_active: !!item.is_active,
    title: item.title,
    description: item.description,
    image: `http://localhost:8000/uploads/images/${item.image}`,
  }));
}

export async function createOurPartnerApi(data: OurPartnerType) {
  let formData = new FormData();

  formData.append('title', JSON.stringify(data.title));
  formData.append('description', JSON.stringify(data.description));
  formData.append('image', data.image);

  return await axios.post(`our-partners/create`, formData);
}

export async function updateOurPartnerApi(data: OurPartnerType) {
  let formData = new FormData();

  formData.append('title', JSON.stringify(data.title));
  formData.append('description', JSON.stringify(data.description));

  // add image if user select new one
  if (typeof data.image !== 'string') formData.append('image', data.image);

  return await axios.post(`/our-partners/${data.id}/edit`, formData);
}

export async function deleteOurPartnerApi(id: number, is_active: boolean) {
  return await axios.put(`our-partners/${id}/toggle`, {
    is_active: !is_active,
  });
}
