import Icon from '@mxjs/icons';
import {useRef, useState} from 'react';
import {Modal} from 'antd';
import PropTypes from 'prop-types';
import {Form} from 'antd';
import {FormItem} from '@mxjs/a-form';

const MiniProgramPicker = ({pickerRef, linkPicker, value}) => {
  const formRef = useRef();
  const [visible, setVisible] = useState(true);

  // 每次都更新
  pickerRef && (pickerRef.current = {
    show: () => {
      setVisible(true);
    },
  });

  return <Modal
    title="填写小程序信息"
    visible={visible}
    width={600}
    bodyStyle={{
      padding: '1rem',
    }}
    onOk={async () => {
      try {
        await formRef.current.validateFields();
      } catch (e) {
        return;
      }

      const appId = formRef.current.getFieldValue('_miniProgramAppId');
      const path = formRef.current.getFieldValue('_miniProgramPath') || '';
      linkPicker.addValue({appId, path});
      setVisible(false);
    }}
    onCancel={() => {
      setVisible(false);
    }}
  >
    <Form ref={formRef} labelCol={{span: 6}} wrapperCol={{span: 14}}>
      <FormItem label="小程序 AppID" name="_miniProgramAppId" initialValue={value.appId} required/>
      <FormItem label="小程序路径" name="_miniProgramPath" initialValue={value.path} extra="留空显示小程序首页"/>
    </Form>
  </Modal>;
};

MiniProgramPicker.propTypes = {
  pickerRef: PropTypes.object,
  linkPicker: PropTypes.object,
  value: PropTypes.object,
};

const MiniProgramPickerLabel = ({value}) => {
  return value.appId + ' ' + value.path;
};

MiniProgramPicker.Label = MiniProgramPickerLabel;

export default [
  {
    value: 'miniProgram',
    label: <>小程序 <Icon type="mi-popup"/></>,
    inputLabel: '小程序',
    picker: MiniProgramPicker,
    pickerLabel: MiniProgramPicker.Label,
  },
];
