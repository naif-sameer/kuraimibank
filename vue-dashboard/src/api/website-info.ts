import axios from '@/helpers/axios';

/********** about us ****************/
export async function getAboutUs() {
  return (await axios.get('website-info/about_us')).data.data.table_value;
}

export async function updateAboutUs(data: object) {
  let res = await axios.put(`/website-info/about_us`, {
    table_value: data,
  });
}

/********** apply for service ****************/
export async function getApplyForServiceData() {
  return (await axios.get('website-info/apply_for_service')).data.data.table_value;
}

export async function updateApplyForServiceData(data: object) {
  let res = await axios.put(`/website-info/apply_for_service`, {
    table_value: data,
  });

  console.log(res);
}

/********** valuesPrinciples ****************/
export async function getValuesPrinciplesData() {
  return (await axios.get('website-info/values_principles')).data.data.table_value;
}

export async function updateValuesPrinciplesData(data: object) {
  let res = await axios.put(`/website-info/values_principles`, {
    table_value: data,
  });

  console.log(res);
}

/********** StrategyStatement ****************/
export async function getStrategyStatementData() {
  return (await axios.get('website-info/strategy_statement')).data.data.table_value;
}

export async function updateStrategyStatementData(data: object) {
  let res = await axios.put(`/website-info/strategy_statement`, {
    table_value: data,
  });

  console.log(res);
}

/********** BoardMembers ****************/
export async function getBoardMembersData() {
  return (await axios.get('website-info/board_members')).data.data.table_value;
}

export async function updateBoardMembersData(data: object) {
  let res = await axios.put(`/website-info/board_members`, {
    table_value: data,
  });

  console.log(res);
}

/********** ContactUs ****************/
export async function getContactUsData() {
  return (await axios.get('website-info/contact_us')).data.data.table_value;
}

export async function updateContactUsData(data: object) {
  let res = await axios.put(`/website-info/contact_us`, {
    table_value: data,
  });

  console.log(res);
}
