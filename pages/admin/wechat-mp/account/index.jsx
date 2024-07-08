import { Page, PageActions } from '@mxjs/a-page';
import { Form, FormAction, FormItem } from '@mxjs/a-form';
import { FormItemUpload } from '@miaoxing/admin';
import { Divider, Select } from 'antd';

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
      <PageActions className="mb-12">
        小程序设置
      </PageActions>
      <Form method="patch" labelCol={{span: 8}} wrapperCol={{span: 8}}>
        <FormItem label="名称" name="nickName"/>
        <FormItemUpload label="头像" name="headImg" max={1}/>
        <FormItem label="AppID（应用ID）" name="applicationId"/>
        <FormItem label="AppSecret（应用密钥）" name="applicationSecret" type="password"/>

        <Divider orientation="left" plain className="mt-8">
          更多设置
        </Divider>
        <FormItem label="小程序环境" name="env" tooltip="发送订阅消息时，跳转的小程序版本">
          <Select options={options}/>
        </FormItem>

        <FormAction wrapperCol={{offset: 8}} list={false}/>
      </Form>
    </Page>
  );
};

export default Index;
