import axios from '@/helpers/axios';
import { PrivacyPolicyType } from '@/types';
//PrivacyPolicy
export async function getPrivacyPolicyApi() {
  let res = (await axios.get('pages/privacy_policy')).data;

  res.title = res.title;
  res.sub_title = res.sub_title;
  res.description = res.description;
  res.is_active = !!res.is_active;

  return res;
}

export async function updatePrivacyPolicyApi(data: PrivacyPolicyType) {
  return await axios.put(`/pages/privacy_policy/edit`, JSON.stringify(data));
}
