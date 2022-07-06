import axios from '@/helpers/axios';
import { JobType } from '@/types';

export async function getJobsApi() {
  return (await axios.get('jobs')).data.map((item: any) => ({
    ...item,
    title: item.title,
    description: item.description,
    is_active: !!item.is_active,
  }));
}

export async function createJobApi(data: JobType) {
  let formData = new FormData();

  formData.append('title', JSON.stringify(data.title));
  formData.append('description', JSON.stringify(data.description));

  return await axios.post(`jobs/create`, formData);
}

export async function updateJobApi(data: JobType) {
  return await axios.put(`/jobs/${data.id}/edit`, JSON.stringify(data));
}

export async function deleteJobApi(id: number, is_active: boolean) {
  return await axios.put(`jobs/${id}/toggle`, {
    is_active: !is_active,
  });
}
