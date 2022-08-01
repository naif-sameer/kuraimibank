import axios from '@/helpers/axios';
import { PrivacyPolicyType } from '@/types';
//PrivacyPolicy
export async function getPrivacyPolicyApi() {
  return (await axios.get('pages/privacy_policy')).data.data;
}

export async function updatePrivacyPolicyApi(data: PrivacyPolicyType) {
  return await axios.put(`/pages/privacy_policy`, JSON.stringify(data));
}
