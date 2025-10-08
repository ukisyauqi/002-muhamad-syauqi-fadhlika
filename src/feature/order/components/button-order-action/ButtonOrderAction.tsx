import { P } from "@/components/ui/p";
import { Colors, metrics } from "@/constants/styles";
import { useOrder } from "@/feature/order/context/order";
import { useColors } from "@/hooks/use-theme";
import { $loading } from "@/store/loading";
import { Order } from "@/types/order";
import { Ionicons } from "@expo/vector-icons";
import { useStore } from "@nanostores/react";
import React, { useMemo, useRef, useState } from "react";
import {
  ColorValue,
  StyleSheet,
  TouchableOpacity,
  View,
} from "react-native";
import Popover from "react-native-popover-view";
import { confirmOrder } from "../../service/confirm-order";
import { unconfirmOrder } from "../../service/unconfirm-order";
import { getOrderActionRules } from "../../util/order-action-rule";

export default function ButtonOrderAction({ orderData }: { orderData: Order }) {
  const [dropdownVisible, setDropdownVisible] = useState<boolean>(false);
  const buttonRef = useRef<TouchableOpacity>(null);

  const colors = useColors();
  const styles = createStyles(colors);
  const {
    refetch,
    setShowModalEdit,
    setShowModalView,
    setShowModalConfirmCancel,
    setShowModalTag,
  } = useOrder();

  const loading = useStore($loading);

  const onActionSuccess = () => {
    refetch();
    setDropdownVisible(false);
  };

  const orderActionRules = useMemo(
    () => getOrderActionRules(orderData),
    [orderData]
  );

  return (
    <View style={styles.container}>
      <TouchableOpacity
        ref={buttonRef}
        onPress={() => setDropdownVisible(true)}
        style={styles.button}
      >
        <Ionicons
          name="ellipsis-vertical"
          size={18}
          color={colors.textTitle}
        ></Ionicons>
      </TouchableOpacity>

      <Popover
        isVisible={dropdownVisible}
        from={buttonRef}
        onRequestClose={() => setDropdownVisible(false)}
        popoverStyle={[styles.dropdown, { backgroundColor: colors.background }]}
      >
        <View>
          {orderActionRules.confirmOrder && (
            <ActionItem
              color={colors.textTitle}
              icon="checkmark-outline"
              label="Konfirmasi"
              loading={loading}
              onPress={() =>
                confirmOrder({
                  id: orderData.id,
                  onSuccess: onActionSuccess,
                })
              }
            />
          )}
          {orderActionRules.unConfirmOrder && (
            <ActionItem
              color={colors.textTitle}
              icon="close-outline"
              label="Batalkan Konfirmasi"
              loading={loading}
              onPress={() =>
                unconfirmOrder({
                  id: orderData.id,
                  onSuccess: onActionSuccess,
                })
              }
            />
          )}
          <ActionItem
            color={colors.textTitle}
            icon="eye-outline"
            label="Lihat"
            loading={loading}
            onPress={() => {
              setShowModalView({
                id: orderData.id,
              });
              setDropdownVisible(false);
            }}
          />
          {orderActionRules.editOrder && (
            <ActionItem
              color={colors.textTitle}
              icon="create-outline"
              label="Edit"
              loading={loading}
              onPress={() => {
                setShowModalEdit({
                  id: orderData.id,
                });
                setDropdownVisible(false);
              }}
            />
          )}

          {orderActionRules.cancelOrder && (
            <ActionItem
              color={colors.error}
              icon="close-circle-outline"
              label="Batalkan"
              loading={loading}
              onPress={() => {
                setShowModalConfirmCancel({
                  id: orderData.id,
                });
                setDropdownVisible(false);
              }}
            />
          )}
          <ActionItem
            color={colors.textTitle}
            icon="pricetags-outline"
            label="Tag"
            loading={loading}
            onPress={() => {
              setShowModalTag({
                id: orderData.id,
                tags: orderData.tags,
              });
              setDropdownVisible(false);
            }}
          />
        </View>
      </Popover>
    </View>
  );
}

function ActionItem({
  color,
  icon,
  label,
  onPress,
  loading,
  hidden,
}: {
  color: ColorValue;
  icon: string;
  label: string;
  onPress: () => void;
  loading: boolean;
  hidden?: boolean;
}) {
  const colors = useColors();
  const styles = createStyles(colors);

  if (hidden) return null;
  return (
    <TouchableOpacity style={styles.item} onPress={onPress} disabled={loading}>
      <Ionicons name={icon as any} size={24} color={color} />
      <P style={{ fontSize: metrics.fontSize.sm, color }}>{label}</P>
    </TouchableOpacity>
  );
}

const createStyles = (colors: Colors) =>
  StyleSheet.create({
    container: {
      alignItems: "center",
      justifyContent: "center",
    },
    button: {
      borderColor: colors.border,
      borderRadius: 8,
      padding: 10,
    },
    buttonText: {
      fontSize: 16,
      color: colors.text,
    },
    dropdown: {
      paddingVertical: 5,
      borderWidth: 1,
      borderColor: colors.border,
      borderRadius: 8,
      elevation: 5,
      shadowOffset: { width: 0, height: 2 },
      shadowOpacity: 0.25,
      shadowRadius: 3.84,
    },
    item: {
      paddingHorizontal: 15,
      paddingVertical: 8,
      display: "flex",
      flexDirection: "row",
      alignItems: "center",
      gap: 10,
    },
  });
