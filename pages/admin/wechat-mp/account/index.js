import {Page, PageActions} from '@mxjs/a-page';
import {Form, FormAction, FormItem} from '@mxjs/a-form';
import {FormItemUpload} from '@miaoxing/admin';

const Index = () => {
  return (
    <Page>
      <PageActions mb12>
        小程序设置
      </PageActions>
      <Form method="patch" labelCol={{span: 8}} wrapperCol={{span: 8}}>
        <FormItem label="名称" name="nickName"/>
        <FormItemUpload label="头像" name="headImg" max={1}/>
        <FormItem label="AppID（应用ID）" name="applicationId"/>
        <FormItem label="AppSecret（应用密钥）" name="applicationSecret" type="password"/>
        <FormAction wrapperCol={{offset: 8}} list={false}/>
      </Form>
    </Page>
  );
};

export default Index;
