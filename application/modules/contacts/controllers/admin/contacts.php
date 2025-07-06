<?php

class Contacts extends Admin_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $data['contacts'] = new Contact();

    if ($this->input->get('s')) {
      $data['contacts']->or_like('first_name', '%' . $this->input->get('s') . '%');
      $data['contacts']->or_like('last_name', '%' . $this->input->get('s') . '%');
      $data['contacts']->or_where('mobile', $this->input->get('s'));
      $data['contacts']->or_where('email', $this->input->get('s'));
    }

    $data['contacts']->order_by('id', 'desc');
    $data['contacts']->get_page(1);
    $this->template->build('admin/index', $data);
  }

  public function view($id = null)
  {
    if (!$id) {
      redirect('contacts/admin/contacts');
      exit();
    }
    $data['contact'] = new Contact($id);
    $this->template->build('admin/view', $data);
  }

  public function save()
  {
    if ($_POST) {
      if ($_FILES['banner']['name']) {
        $banner = new Photo(10);
        $banner->delete_file('uploads/photo/', 'image');
        $banner->image = $banner->upload($_FILES['banner'], 'uploads/photo/', $banner->width, $banner->height);
        $banner->save();
      }

      $settings = $this->input->post('setting');
      foreach ($settings as $key => $value) {
        $setting = new Setting();
        $setting->get_by_key($key);
        $setting->key = $key;

        if (is_array($value)) {
          $setting->value = json_encode($value);
        } else {
          $setting->value = $value;
        }
        $setting->save();
      }
      set_notify('success', lang('save_data_complete'));
      redirect('contacts/admin/contacts/form');
    }
  }

  public function delete($id)
  {
    $contact = new Contact($id);
    $contact->delete();
    set_notify('success', lang('delete_data_complete'));
    redirect($_SERVER['HTTP_REFERER']);
  }

  public function export()
  {
    $contacts = new Contact();
    $contacts->order_by('id desc')->get();
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=register' . time() . '.csv');
    $output = fopen('php://output', 'w');
    fwrite($output, "\xEF\xBB\xBF");
    fputcsv($output, ['#', 'Issue', 'Name', 'Surname', 'Mobile', 'Email', 'Created']);
    $i = 0;
    foreach ($contacts as $contact) {
      fputcsv($output, [++$i, $contact->issue, $contact->first_name, $contact->last_name, $contact->mobile, $contact->email, $contact->created]);
    }
  }
}
