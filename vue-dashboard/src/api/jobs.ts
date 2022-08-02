import axios from '@/helpers/axios';
import { JobType } from '@/types';

export async function getJobsApi() {
  return (await axios.get('jobs')).data.data;
}

export async function createJobApi(jobData: JobType) {
  return await axios.post(`jobs`, jobData);
}

export async function updateJobApi(data: JobType) {
  return await axios.put(`/jobs/${data.id}`, data);
}

export async function deleteJobApi(id: number, is_active: boolean) {
  return await axios.put(`jobs/${id}/toggle`, {
    is_active: !is_active,
  });
}
