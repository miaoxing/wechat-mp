import { Page } from '@mxjs/a-page';
import { Form, FormActions, FormItem } from '@mxjs/a-form';
import { FormItemUpload } from '@miaoxing/admin';
import { Select } from 'antd';
import { Section } from '@mxjs/a-section';

const options = [
  {
    label: '正式版',
    value: 1,
  },
  {
    label: '体验版',
    value: 2,
  },
  {
    label: '开发版',
    value: 3,
  },
];

const Index = () => {
  return (
    <Page>
      <Form method="patch">
        <Section title="基础信息">
          <FormItem label="名称" name="nickName"/>
          <FormItemUpload label="头像" name="headImg" max={1}/>
          <FormItem label="AppID（应用ID）" name="applicationId"/>
          <FormItem label="AppSecret（应用密钥）" name="applicationSecret" type="password"/>
        </Section>

        <Section title="更多设置">
          <FormItem label="小程序环境" name="env" tooltip="发送订阅消息时，跳转的小程序版本">
            <Select options={options}/>
          </FormItem>
        </Section>

        <FormActions list={false}/>
      </Form>
    </Page>
  );
};

export default Index;
